import { extend } from 'flarum/common/extend';
import ForumApplication from 'flarum/common/ForumApplication';
import Audio from './components/Audio';

app.initializers.add('zerosonesfun/flarum-essential-audio', () => {
  extend(ForumApplication.prototype, 'mount', () => {
      m.mount(document.body.appendChild, Audio);
  });
});