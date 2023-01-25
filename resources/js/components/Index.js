import React,{Component} from 'react';
import ReactDom from 'react-dom';

export default class Index extends Component {
    constructor(props) {
        super(props);
    }

    
    
    render(){
        return(
                <h1>Bienvenue sur le site CPJLM CONSEIL {this.props.name}</h1>
        )
    }
}

if(document.getElementById('index')){
    ReactDom.render(<Index name="dorian"/>,document.getElementById('index'));
}
