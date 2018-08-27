const MongoClient = require('mongodb').MongoClient
const url = 'mongodb://elena:elena1@ds018258.mlab.com:18258/receipts';

class mongoDbRepository {
  constructor() {
  }

  getReceipts(mealId) {
    return new Promise(function (resolve, reject) {
      MongoClient.connect(url, { useNewUrlParser: true }, (err, client) => {
        if (err) {
          reject(err);
        } else {
          let db = client.db('receipts');
          db.collection('receipts').find({ 'mealId': mealId }).toArray(function (err, results) {
            if (err) {
              reject(err);
            }
            else {
              results.forEach(r => {
                delete r['_id'];
              });
              resolve(results);
            }
          })
        }
      })
    });
  }

  getIngredients(mealId) {
    return new Promise(function (resolve, reject) {
      MongoClient.connect(url, { useNewUrlParser: true }, (err, client) => {
        if (err) {
          reject(err);
        } else {
          let db = client.db('receipts');
          db.collection('ingredients').find({ 'mealId': mealId }).toArray(function (err, results) {
            if (err) {
              reject(err);
            }
            else {
              results.forEach(r => {
                delete r['_id'];
              });
              resolve(results);
            }
          })
        }
      })
    });
  }
}


module.exports = mongoDbRepository;








