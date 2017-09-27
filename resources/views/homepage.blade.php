<html>
<link rel="stylesheet" type="text/css" href="/css/containers.css">

@include('app_part.banner')


<div class="maincontainer">
  <div style="width:50%;position:absolute;top:0%;left:0%">
    <div style="position:relative;padding:10px;">
	<div style="background:#3498DB;border-radius: 15px;padding:5px;">
    <h2>Welcome!</h2>
    <p>I noticed a few threads of people asking for hardware compatibility database
      when it came to GPU pass through and known working hardware. There are a few forum threads and excel sheets laying around,
      but wouldn't it be easier for people to be able to quickly add / view different configurations along with notes, etc?</p>
      <p>The website works in the following way:</p>
      <ul>
        <li><b>Distrobutions</b> - Distrobution you are running, without the version number (I added the big ones but there are plenty more)</li>
        <li><b>Vendors</b> - Hardware manufacturers</li>
        <li><b>Components</b> - Here is where you select type, vendor, and give the part a "common name" and a model number. Please search through this for
        the model of component you are looking for before you make your configuration!</li>
        <li><b>Configurations</b> - This is what links everything together. Along with Motherboard,CPU,RAM(...or not), and video cards, you will want the following:</li>
          <ul>
            <li>Distro</li>
            <li>Distro version</li>
            <li>Kernel version</li>
            <li>Hypervisor (KVM or Xen)</li>
            <li>Hypervisor version (Xen)</li>
            <li>QEMU Version</li>
            <li>Patches / fixes</li>
            <li>Any other notes</li>
            <li>Overall Working / Not working</li>
          </ul>
      </ul>
	</div>
    </div>
  </div>

  <div style="width:50%;float:right;position:absolute;top:0%;left:50%">
    <div style="position:relative;padding:10px;">
	<div style="background:#3498DB;border-radius: 15px;padding:5px;">
		<h2>News</h2>
    		@foreach ($news_items as $item)
    			<div style="background:#E4F1FE;border-radius: 15px;padding:5px;margin:10px">
      				<h3>{{$item->subject}}</h3>
				<hr/>
      				<p>{{$item->content}}</p>
				<hr/>
				<p>{{$item->timestamp}}</p>
    			</div>
		@endforeach
	</div>
    </div>
  </div>
</div>

</html>
