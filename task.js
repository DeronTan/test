self.onmessage = function(e){
    self.postMessage(e.data + 'world');
}