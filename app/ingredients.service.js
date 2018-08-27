const Repo = require('./mongodb.repository');

class IngredientsService {
    constructor() {
    }
    get(mealId) {
        return new Promise(function (resolve, reject) {
            let repo = new Repo();
            repo.getIngredients(mealId).
                then(result => resolve(result));
        })
    }
}
module.exports = IngredientsService;