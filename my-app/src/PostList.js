import React, { Component } from "react";
import PostItem from "./PostItem";

const data = [
    {title: "标题1", author: '作者1', date: '2020-10-15 17:00:00'},
    {title: "标题2", author: '作者2', date: '2020-10-15 17:00:00'},
    {title: "标题3", author: '作者3', date: '2020-10-15 17:00:00'},
];

class PostList extends Component {
    render() {
        return (
            <div>
                BBS帖子列表：
                <ul>
                    {data.map(item =>
                        <PostItem>
                            title={item.title}
                            author={item.author}
                            date={item.date}
                        </PostItem>
                    )}
                </ul>
            </div>
        );
    }
}

export default PostList;
