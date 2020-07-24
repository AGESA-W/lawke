function markNotificationAsRead(notificationcount){
    if(notificationcount !== 0){
       $.get('/markAsRead'); 
    }
    
}