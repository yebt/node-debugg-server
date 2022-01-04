const express = require('express');
const bodyParser = require('body-parser');
const APP = express();
const PORT = 5000

APP.use(bodyParser.urlencoded({ extended: false }));
APP.use(bodyParser.json());

APP.get('/', (req, res) => {
    res.send('Hello World!');
})

APP.post('/', (req, res) => {
    const date = new Date();
    console.log(req.body);
    res.send({"message": "Hello World"});
    
})
APP.post('/time', (req, res) => {
    const date = new Date();
    console.log( ">> ",
        date.getFullYear() + "/" + date.getMonth() + "/"+date.getDay(),
        date.getHours()+":"+date.getMinutes()+":"+date.getSeconds()+"."+date.getMilliseconds(),
        "----");
    console.log(req.body);
    res.send({"message": "Hello World"});
})



APP.listen(PORT, () => {
    console.log('-----------------------------------------------');
    console.log(`Example app listening at http://localhost:${PORT}`)
    console.log('-----------------------------------------------');
    console.log('');


})
