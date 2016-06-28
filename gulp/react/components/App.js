import React, { Component, PropTypes } from 'react';
import Drawer from 'material-ui/Drawer';
import MenuItem from 'material-ui/MenuItem';
import RaisedButton from 'material-ui/RaisedButton';
import MoreVertIcon from 'material-ui/svg-icons/navigation/more-vert';
import { connect } from 'react-redux';
import { Link } from 'react-router';
import { getCategories } from '../helpers/functions';
import Slider from './Slider';
class AppComponent extends Component
{
    constructor(props) {
        super(props);
        this.state = {open: false};
    }

    componentWillMount(){
        getCategories(this.props.dispatch);
    }

    handleOpenMenu = () => this.setState({open: true});
    handleCloseMenu = () => this.setState({open: false});
    render()
    {
        let {categories, children} = this.props;
        return (
            <div>
                <Drawer open={this.state.open}>
                    { categories.map((category, index)=>
                        <MenuItem key={index}><Link to={`/${category.slug}`}> {category.name}</Link></MenuItem>
                    )}
                </Drawer>
                <div className="main-slider col-xs12"
                     onMouseLeave={this.handleOpenMenu}
                     onMouseEnter={this.handleCloseMenu}
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