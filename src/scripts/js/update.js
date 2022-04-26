const fs = require('fs');
const { MongoClient } = require("mongodb");

// Read nasa-tlx json data
fs.readFile('../../data/participant_data.json', (err, data) => {
    if (err) throw err;
    let participant = JSON.parse(data);


    // Replace the uri string with your MongoDB deployment's connection string.
    const uri = "mongodb+srv://codetrics:CodeTrics127@cluster0.caket.mongodb.net/codetrics?retryWrites=true&w=majority";

    const client = new MongoClient(uri);

    // Database editing
    async function run() {
    try {
        await client.connect();

        const database = client.db('codetrics');
        const collection = database.collection('CodeLogs');
        const result = await collection.insertOne(participant);


        console.log(`A document was inserted with the _id: ${result.insertedId}`);
    } finally {
        // Ensures that the client will close when you finish/error
        await client.close();
    }
    }
    run().catch(console.dir);
});
