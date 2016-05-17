import React, { Component, PropTypes } from 'react';
import DropDownMenu from 'material-ui/DropDownMenu';
import MenuItem from 'material-ui/MenuItem';
import IconButton from 'material-ui/IconButton/IconButton';
import MoreVertIcon from 'material-ui/svg-icons/navigation/more-vert';

class Menu extends Component {

    constructor(props) {
        super(props);
        this.state = {value: 2};
    }

    handleChange = (event, index, value) => this.setState({value});

    render(){
        return(
                <DropDownMenu value={this.state.value} onChange={this.handleChange}>
                    <MenuItem value={1} primaryText="Never" />
                    <MenuItem value={2} primaryText="Every Night" />
                    <MenuItem value={3} primaryText="Weeknights" />
                    <MenuItem value={4} primaryText="Weekends" />
                    <MenuItem value={5} primaryText="Weekly" />
                </DropDownMenu>
        );
    }
}
export default  Menu;