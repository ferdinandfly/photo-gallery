module.exports = {
    "bower": {
        "workingDirectory": "./../",
        "components": "./bower_components"
    },
    "dest":{
        "css": "./../web/css",
        "js":  "./../web/js",
        "images": "./../web/img",
        "fonts": "./../web/fonts"
    },
    "react": {
        "src": "./react/app.js",
        "dest": "app.js"
    },
    "css" : {
        "src" : [
            './sass/bootstrap-custom.scss',
            './sass/index.scss'
        ],
        "dest": "core.css"
    },
    "images": {
        "src": "./images/**/*"
    }
};
