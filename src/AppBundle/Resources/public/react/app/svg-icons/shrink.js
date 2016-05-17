'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _react = require('react');

var _react2 = _interopRequireDefault(_react);

var _reactAddonsPureRenderMixin = require('react-addons-pure-render-mixin');

var _reactAddonsPureRenderMixin2 = _interopRequireDefault(_reactAddonsPureRenderMixin);

var _svgIcon = require('material-ui/lib/svg-icon');

var _svgIcon2 = _interopRequireDefault(_svgIcon);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var ContentShrink = _react2.default.createClass({
    displayName: 'ContentShrink',
    mixins: [_reactAddonsPureRenderMixin2.default],
    render: function render() {
        return _react2.default.createElement(
            _svgIcon2.default,
            this.props,
            _react2.default.createElement('path', { d : "M14.077,56.504l-6.685-6.68H29.72v22.317l-6.685-6.686L8.961,79.536L0,70.578L14.077,56.504z    M70.589,79.536l8.947-8.958L65.462,56.509l6.68-6.685H49.824v22.317l6.68-6.68L70.589,79.536z M79.536,8.956L70.589,0   l-14.08,14.084l-6.685-6.682v22.307l22.328,0.01l-6.69-6.692L79.536,8.956z M7.402,29.72h22.312L29.73,7.392l-6.685,6.693L8.961,0   L0,8.966l14.077,14.062L7.402,29.72z M39.769,30.054c-5.367,0-9.714,4.347-9.714,9.714c0,5.375,4.347,9.724,9.714,9.724   c5.364,0,9.719-4.35,9.719-9.724C49.487,34.401,45.133,30.054,39.769,30.054z"})
        );
    }
});
exports.default = ContentShrink;
module.exports = exports['default'];