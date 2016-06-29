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
    "sass" : {
        "src" : [
            './sass/bootstrap-custom.scss',
            './sass/index.scss'
        ],
        "dest": "core.css"
    },
    "css": {
        "src": [
            '../node_modules/react-owl-carousel/src/owl.carousel.css'
        ],
        "dest": "vendor.css"
    },
    "images": {
        "src": "./images/**/*"
    }
};
