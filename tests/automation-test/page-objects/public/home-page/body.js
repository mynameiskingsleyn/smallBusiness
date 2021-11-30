//page objects
var Body = function(){}

Body.prototype = Object.create({},{
  intro: {get: function(){return element(by.id('cmp-head'))}},
  mainP1: {get: function(){return element(by.css('#p1'))}},
  mainP2: {get: function(){return element(by.css('#p2'))}}
});

module.exports = Body
