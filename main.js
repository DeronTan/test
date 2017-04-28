/**
 * Created by xiecheng on 16/7/21.
 */
var worker = new Worker('task.js');
worker.postMessage('hello');
worker.onmessage = function(e){
    alert(e.data);
};