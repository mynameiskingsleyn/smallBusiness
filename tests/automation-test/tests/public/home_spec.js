// page Object file
var BasePage = require('../../page-objects/base-page');
var Header = require('../../page-objects/public/home-page/header');
var Body = require('../../page-objects/public/home-page/body');
describe('Home Page Test', function(){

  var basePage
  var header;
  var body;

  beforeEach(function(){
    // not angular site
    browser.ingoreSynchronization = true;
    browser.waitForAngularEnabled(false);
    // create page object
    basePage= new BasePage();
    header = new Header();
    body = new Body();

    //open url
    browser.get(basePage.baseUrl);

  });

  afterEach(function(){

  });

  it('loads all header elements', function(){
     expect(header.appBrand.isDisplayed()).toBe(true);
  })

  it('loads all body elements', function(){
    expect(body.mainP1.isDisplayed()).toBe(true);
    expect(body.mainP2.isDisplayed()).toBe(true);
  })

  it('on clicking brand name returns to homepage', function(){
    header.appBrand.click();
    expect(browser.getCurrentUrl()).toEqual(basePage.baseUrl);
  })

});
