var express=require("express");
var bodyParser=require("body-parser");

var app=express();


app.use(bodyParser.urlencoded({extended: true}))


app.use(bodyParser.json());
app.use(function(req, res, next){
  res.setHeader('Access-Control-Allow-Origin', 'http://localhost:3002');
  res.setHeader('Access-Control-Allow-Methods', 'GET,POST,OPTIONS,PUT,PATCH,DELETE');
  res.setHeader('Access-Control-Allow-Headers', 'Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers');
  res.setHeader('Access-Control-Allow-Credentials', true);
  next();
});

const port = process.env.PORT || 3001;

const { MongoClient } = require("mongodb");


// Replace the uri string with your MongoDB deployment's connection string.
const uri =
  "mongodb+srv://codetrics:CodeTrics127@cluster0.caket.mongodb.net/codetrics?retryWrites=true&w=majority";

const client = new MongoClient(uri);

async function run() {
  try {

    client.connect();

    const database = client.db('codetrics');
    const collection = database.collection('CodeLogs');
    // const result = await collection.insertOne({test:"Hell"});
    app.post('/demographics', function(req, res){  
      collection.insertOne(req.body);
    });


    app.post('/nasa-script', function(req, res){  
      collection.insertOne(req.body);
    });


    // console.log(`A document was inserted with the _id: ${result.insertedId}`);
  } finally {
    // Ensures that the client will close when you finish/error
    await client.close();
  }
}
run().catch(console.dir);
app.listen(port, function() {
  console.log("Running on " + port);
});
