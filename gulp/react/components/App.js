import React, { Component, PropTypes } from 'react';
import Drawer from 'material-ui/Drawer';
import MenuItem from 'material-ui/MenuItem';
import RaisedButton from 'material-ui/RaisedButton';
import MoreVertIcon from 'material-ui/svg-icons/navigation/more-vert';
import { connect } from 'react-redux';
import { Link } from 'react-router';
import { getCategories } from '../helpers/functions';
import Slider from './Slider';
import IconButton from 'material-ui/IconButton';
import ImageDehaze from 'material-ui/svg-icons/image/dehaze';
import AppBar from 'material-ui/AppBar';

class AppComponent extends Component {
    constructor(props) {
        super(props);
        this.state = {open: false};
    }

    componentWillMount() {
        getCategories(this.props.dispatch);
    }

    handleOpenMenu = () => this.setState({open: true});
    handleCloseMenu = () => this.setState({open: false});
    //toggleMenu = () => this.setState({open: !this.state.open});
    render() {
        let {categories, children} = this.props;
        return (
            <div className="row">
                <IconButton className="menu-button" onMouseDown={this.handleOpenMenu}>
                    <ImageDehaze />
                </IconButton>
                <Drawer open={this.state.open}>
                    <AppBar title="Menu" onLeftIconButtonTouchTap={this.handleCloseMenu}/>
                        { categories.map((category, index)=>
                            <Link key={index} to={`/${category.slug}`}> <MenuItem > <span className="menu-item" >{category.name}</span></MenuItem></Link>
                        )}
                </Drawer>
                <div className="main-slider col-xs-12"
                     onClick={this.handleCloseMenu}
                >
                    { children || <Slider params={ {category: "test"}}/>}
                </div>
            </div>
        );
    }
}
const mapState = (state) => {
    return {
        categories: state.main.categories
    }
};
const App = connect(mapState)(AppComponent);
export default App;