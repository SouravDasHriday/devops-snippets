// This script runs when the MongoDB container is initialized.

// Switch to the database specified in the .env file (it will be created if it doesn't exist)
db = db.getSiblingDB(process.env.MONGO_DATABASE);

// Create a new user with read/write permissions on that database
db.createUser({
  user: process.env.MONGO_USER,
  pwd: process.env.MONGO_PASSWORD,
  roles: [{
    role: "readWrite",
    db: process.env.MONGO_DATABASE
  }]
});
