// Add Class to Allow Buttons to Activate Chat Window
$('.activate-zopim').click(function(e){
    e.preventDefault();
    
    $zopim(function() {
       $zopim.livechat.window.show();
    });
});

// Open Chat Window When Agent Initiates Chat
$zopim.livechat.setOnChatStart(function() {
   $zopim.livechat.window.show(); 
});