// Add Class to Allow Buttons to Activate Chat Window
$('.activate-zopim').click(function(e){
    e.preventDefault();
    
    $zopim(function() {
       $zopim.livechat.window.show();
    });
});

// Add Class to Close Badge when close button is clicked.
$('.close-chat-badge').click(function(){
   $('.chat-badge').css('display', 'none' ); 
});

// Open Chat Window When Agent Initiates Chat
$zopim.livechat.setOnChatStart(function() {
   $zopim.livechat.window.show(); 
});