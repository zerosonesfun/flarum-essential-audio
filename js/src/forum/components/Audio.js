import { extend } from 'flarum/extend';
import Component from 'flarum/common/Component';
import PostStream from 'flarum/common/components/PostStream';

export default class Audio extends Component {
    oninit(vnode) {
        super.oninit(vnode);
            var body = document.body;
            body.classList.add("audio");
            extend(PostStream.prototype, 'view', function(vnode) {
                if (vnode.children && vnode.children.splice) {
                    const insert = <script src={`${app.forum.attribute('baseUrl')}/assets/extensions/zerosonesfun-essential-audio/essential-audio.js`}></script>;
                    vnode.children.splice(1, 0, insert);
                  }
              });
    }
    view() {
        return;
    }
}