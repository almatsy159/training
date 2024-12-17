
const express = require('express');
const auth = require('../middleware/auth');
const multer = require('../middleware/multer-config.js');
const router =  express.Router();

//const Thing = require('../models/Thing');
const stuffCtrl = require("../controllers/stuff");
//const userCtrl = require("../controllers/user");

//route.get("/",auth,stuffCtrl);
router.post('/',auth,multer,stuffCtrl.createThing);
router.get('/:id',auth,stuffCtrl.getOneThing);
router.get('/',auth,stuffCtrl.getThings);
router.put('/:id',auth,stuffCtrl.modifyThing);
router.delete('/:id',auth,stuffCtrl.deleteOneThing);

module.exports = router;