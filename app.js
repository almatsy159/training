const express = require('express');
const mongoose = require('mongoose')
const path = require('path');
//const __dirname__ = require("__dirname__")

const stuffRoute = require('./routes/stuff.js')
const userRoute = require("./routes/user.js")

mongoose.connect('mongodb+srv://user:user@cluster0.cmmj3.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0',
    { useNewUrlParser: true,
        useUnifiedTopology: true })
    .then(() => console.log('Connexion à MongoDB réussie !'))
    .catch(() => console.log('Connexion à MongoDB échouée !'));

    const app = express();


app.use((req, res, next) => {
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content, Accept, Content-Type, Authorization');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    next();
});

app.use(express.json());
app.use('/api/stuff/',stuffRoute);
app.use('/api/auth/',userRoute);
app.use('/images',express.static(path.join(__dirname,'images')));

module.exports = app;