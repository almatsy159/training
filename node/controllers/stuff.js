const Thing = require("../models/Thing") 

exports.createThing = (req,res,next) => {
    const thingObject = JSON.parse(req.body.thing);
    delete thingObject.id;
    delete thingObject._userId;
    const thing = new Thing({
        ...thingObject,
        userId:req.auth.userId,
        imageUrl: `${req.protocol}://${req.get('host')}/images/${req.file.filename}`
});
thing.save()
    .then(() => res.status(201).json({message: 'obj enregistré'}))
    .catch(error => res.status(400).json({error}));
};

exports.modifyThing = (req,res,next) => {
    Thing.updateOne({_id:req.params.id},{...req.body,_id:req.params.id})
    .then(()=>res.status(200).json({message:"objet modifié"}))
    .catch((error=> res.status(400).json({error})));
};

exports.getOneThing = (req,res,next) => {
    Thing.findOne({_id:req.params.id})
    .then(thing=> res.status(200).json(thing))
    .catch(error=>res.status(400).json(error))
};

exports.getThings = (req, res, next) => {
    Thing.find()
    .then(things => res.status(200).json(things))
    .catch(error => res.status(400).json(error))
};

exports.deleteOneThing = (req,res,next) => {
    Thing.deleteOne({_id:req.params.id})
    .then(()=>res.status(200).json({message:"objet supprimé"}))
    .catch((error=> res.status(400).json({error})));
};