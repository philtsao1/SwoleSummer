var express = require('express');
var bodyParser = require('body-parser')
var receiptsService = require('./app/receipt.service');
var ingredientsService = require('./app/ingredients.service');
var app = express();

var jsonParser = bodyParser.json()

var port = process.env.PORT || 3000;

app.get('/ingredients/:mealId', function (req, res) {
    var service = new ingredientsService();
    service.get(req.params.mealId, req.body).
        then(result => res.send(result));
})

app.post('/receipts/:mealId', jsonParser, function (req, res) {
    var service = new receiptsService();
    service.get(req.params.mealId, req.body).
        then(result => res.send(result));
})
app.set('json spaces', 40);
app.listen(port, function () {
    console.log('Receipt Api running on PORT: ' + port);
});