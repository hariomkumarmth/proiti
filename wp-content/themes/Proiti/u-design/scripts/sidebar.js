var slider=function()
{
    var array=[] ,speed=10, timer=10;
	
    return{
	init:function(t,c, n)
	{
       var op = document.getElementById('sidebar').getElementsByTagName('ul')[c-1].getElementsByTagName('li')[n-1].getElementsByTagName('a')[0];
	 op.className = 'openPage';
	 op.removeAttribute("href");

	 var s, ds, l, i = 0,y = 0;
	 s=document.getElementById(t); 
	 ds=s.getElementsByTagName('div'); 
			
	 l=ds.length; 
	 
	for(i=0;i<l;i++)
	{
	  var d,did; 
	  d=ds[i]; 
	  did=d.id;
	
	 if(did.indexOf("tab")!=-1)
	 {
	   y++; 
	   d.onclick=new Function("slider.process(this)");
	   
	   if (y==c) 
	     d.className = 'tabOpen'; 
	     
	 }
	  
	  else if(did.indexOf("content")!=-1)
	  {
		array.push(did.replace('-content','')); 
		d.maxh=d.offsetHeight;
		
		if(c!=y)
		{
			d.style.height='0px'; 
			d.style.display='none';
		} 
		
		else
		  	d.style.display='block';
	   } 
	}
     },
		
	process:function(d)
	{
	  var cl=array.length , i = 0;
			
	  for(i;i<cl;i++)
	  {
		var s,h,c,cd;
				
		s=array[i]; 
		h=document.getElementById(s+'-tab');
		c=s+'-content'; 
		cd=document.getElementById(c); 
		clearInterval(cd.timer);
				
		if(h==d && cd.style.display=='none')
		{
		  cd.style.display='block'; 
		  h.className = "tabOpen";
		  this.islide(c,1);
		}
		
		else if(cd.style.display=='block')
		{
		  h.className = "tab";
		  this.islide(c,-1)
		}
				
	    }
	  },
		
	  islide:function(i,d)
	  {
		var c,m; 
		c=document.getElementById(i); 
		m=c.maxh; 
		c.direction=d; 
		c.timer=setInterval("slider.slide('"+i +"')",timer)
	  },
		
		slide:function(i)
		{
			var c,m,h,dist; 
			c=document.getElementById(i); 
			m=c.maxh; h=c.offsetHeight;
			dist=(c.direction==1)?Math.round((m-h)/speed):Math.round(h/speed);
			
			if(dist<=1)
				dist=1
		
			c.style.height=h+(dist*c.direction)+'px'; 
			c.style.opacity=h/c.maxh; c.style.filter='alpha(opacity='+(h*100/c.maxh)+')';
			
			if(h<2 && c.direction!=1)
			{
				c.style.display='none'; 
				clearInterval(c.timer);
			}
			
			else if(h>(m-2) && c.direction==1)
				clearInterval(c.timer)
		}
      };
}();

