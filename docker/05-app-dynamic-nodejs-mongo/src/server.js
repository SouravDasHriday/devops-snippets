const express = require('express');
const mongoose = require('mongoose');

// App Constants
const PORT = 3000;
const HOST = '0.0.0.0'; // Important to listen on 0.0.0.0 inside a container

// App
const app = express();

// Database Connection Details from Environment Variables
const {
  MONGO_USER,
  MONGO_PASSWORD,
  MONGO_HOST,
  MONGO_DATABASE
} = process.env;

const mongoURI = `mongodb://${MONGO_USER}:${MONGO_PASSWORD}@${MONGO_HOST}:27017/${MONGO_DATABASE}?authSource=admin`;

let dbStatus = "Not Connected";

// Attempt to connect to MongoDB
mongoose.connect(mongoURI)
  .then(() => {
    console.log('MongoDB Connected successfully!');
    dbStatus = 'Successfully Connected';
  })
  .catch(err => {
    console.error('MongoDB connection error:', err);
    dbStatus = `Connection Failed: ${err.message}`;
  });

// Root endpoint to display status
app.get('/', (req, res) => {
  res.send(`
    <h1>Node.js & MongoDB App</h1>
    <h2>Database Connection Status: ${dbStatus}</h2>
  `);
});

app.listen(PORT, HOST, () => {
  console.log(`Server running on http://${HOST}:${PORT}`);
});
