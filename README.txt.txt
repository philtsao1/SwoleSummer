1. npm install - to install all dependencies
2. node index.js - to start the api 

To get all ingredients based on mealId
Get /ingredients/{mealId}

Example: GET http://localhost:3000/ingredients/4
Response: 
[
    {
        "id": "68",
        "mealId": "4",
        "name": "Pasta"
    },
    {
        "id": "69",
        "mealId": "4",
        "name": " Onion"
    },
    {
        "id": "70",
        "mealId": "4",
        "name": " Beef Hot Dog"
    },.........
]



To get reciepts based on mealId and selected ingredients
Post /ingredients/{mealId}
Body: [{"id": ingredientId1}, {"id": ingredientId2}]


Example: POST http://localhost:3000/receipts/1
         Body [{"id":62}]
		 
Response: 
[
    {
        "mealId": "1",
        "name": "YOGURT  PARFAIT",
        "calories": "269",
        "ingredients ": "scant 1/2 cup Granola, divided ** 1/2 cup 2% Greek Yogurt, divided ** handful of berries",
        "instructions ": "In a glass, add 2 tablespoon of berries and use a spoon to spread it evenly. Layer it with 2 tablespoon of yogurt and top it with berries. Repeat with remaining granola, yogurt, and berries. Serve immediately for best taste but it can also be assembled a night before and stored in the fridge although it might affect the texture a little bit.",
        "ingredients": [
            {
                "id": "62",
                "mealId": "1",
                "name": "Granola"
            },...........
        ]
    } 
]