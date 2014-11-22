function WebDropClient(client)
{
	this.client=client;

	this.client.on('connect', function(data) {
		jQuery('#input').show();
	});

	this.client.on('disconnect', function(data) {
		
		jQuery('.webDropUser[data-id='+data.data.id+']').fadeOut(500, function() {
			jQuery('.webDropUser[data-id='+data.data.id+']').remove();
		})
	});


	
	this.client.on('userList', function(data) {
		var container=jQuery('.userList');
		var userlist=data.data;

		for(var i=0; i<userlist.length; i++) {
			if(!jQuery(container).find('.webDropUser[data-id='+userlist[i].id+']').length) {
				var user=new WebDropUser(client, userlist[i].id);
				var element=user.getElement();
				element.style.display='none';
				jQuery(container).append(element);
				jQuery(element).fadeIn(500);
			}
		}
	});
	
	this.client.on('downloadFile', function(data) {
		var iframe=document.getElementById('download');
		iframe.src=data.data.file
	});
}

WebDropClient.prototype.connect=function(url) {
	var self=this;
	jQuery.ajax({
		url: url,
		success: function(data) {
			self.client.setURL('ws://'+data.ip+':'+data.port+'/'+data.serviceName);
			self.client.connect();
		}
	});
}

