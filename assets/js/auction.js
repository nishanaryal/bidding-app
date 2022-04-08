function bid(slug,id)
		{
		  if(confirm('Sure Participate?'))
		  {
		  	 window.location='products.php?name='+slug+'&'+'bid='+id
		    // alert('You Are Not Sign in, Please Sign In For Bid');
		    // window.location='BidProduct.php?bid='+id
		  }
		}


