import React, {Component} from "react";

class PostItem extends Component {
    render() {
        const {title, author, date} = this.props;
        return (
            <li>
                <div>{title}</div>
                <div>{author}</div>
                <div>{date}</div>
            </li>
        );
    }
}

export default PostItem;
