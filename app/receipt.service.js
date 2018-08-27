const Repo = require('./mongodb.repository');

class receiptService {
    constructor() {
    }
    get(mealId, ingredients) {
        return new Promise(function (resolve, reject) {
            let repo = new Repo();
            //get receipts based on mealid
            repo.getReceipts(mealId).then(result => {
                //convert ingredients paramater data to array of ingredient ids
                let ingredientIds = ingredients.map(i => i.id.toString());
                let receiptsWithIngredients = [];
                result.forEach(r => {
                    //foreach receipts ingredient list '1;23;45;', split the sprint 
                    //and convert to array of ingredient ids
                    let receiptIngredientIds = r.ingredientsId.split(';');
                    //check if receipt ingredients id include ingredient ids from paramater
                    if (ingredientIds.some(i => receiptIngredientIds.includes(i))) {
                        receiptsWithIngredients.push(r);
                    }
                });

                let response = [];
                //get ingredients based on mealid
                repo.getIngredients(mealId).then(ingredientsResults => {
                    //assign ingredient info to receipt that has ingredient
                    receiptsWithIngredients.forEach(r => {
                        let receiptIngredientIds = r.ingredientsId.split(';');
                        delete r['ingredientsId'];
                        r.ingredients = [];
                        receiptIngredientIds.forEach(i => {
                            let foundIngredient = ingredientsResults.find(ir => ir.id == i);
                            r.ingredients.push(foundIngredient);
                        })
                        response.push(r);
                    });
                    resolve(response);
                });
            })
        })
    }
}

module.exports = receiptService;
