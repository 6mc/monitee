<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Welcome to board</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.4.6/tailwind.min.css'>
<link rel='stylesheet' href='https://unpkg.com/98.css'><link rel="stylesheet" href="/mtyle.css">

</head>
<body>
<!-- partial:index.partial.html -->
<body class="bg-cover flex justify-center items-center bg-center" style="background-image: url(https://i.imgur.com/INZkyuF.gif)">
	<div class="window z-10">
		<div class="title-bar">
			<div class="title-bar-text">Graphic Design Is My Passion</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize"></button>
				<button aria-label="Maximize"></button>
				<button aria-label="Close"></button>
			</div>
		</div>
		<div class="window-body">
			<div class="flex items-start">
				<img src="https://www.laweekly.com/wp-content/uploads/2019/05/tom_anderson_myspace_smjpg_jpeg_image_230x228_pixels.png" width="96" class="mt-1">
				<div class="ml-2">
					<div class="flex item-center">
						<h1 class="text-xl font-bold">Ted Goas</h1> <img src="https://66.media.tumblr.com/14f9a65f9733eac78600ea51b979cfd3/tumblr_ng4sf61TfA1qcwgxao1_500.gifv" width="24" class="ml-1 -mt-1">
					</div>
					<p class="text-sm">Trying to create work that is cool enough to show my friends and honest enough to show my parents.</p>
					<p class="text-sm mt-1">I'm from New Jersey: greatest country in the world.</p>
					<p class="text-sm mt-1"><a href="https://www.tedgoas.com/" class="mr-2">Join my webring</a> <a href="https://twitter.com/TedGoas/status/1263926891511193600">Add me on MySpace</a></p>
				</div>
			</div>
			<fieldset class="mt-4">
        	<div class="grid grid-cols-3 gap-4">
        @foreach ($employees as $employee)

    <div class="">
      <label class="font-bold mb-1">{{$employee->name}}</label>
        @foreach ($entries as $entry)
      <div class="field-row">
        <input checked type="checkbox" id="1">
        @if ($entry->computer == $employee->pc)
          <label for="1">{{$entry->process }}</label>
        @endif
      </div>
      @endforeach
    </div>
@endforeach
				</div>
			</fieldset>
			<img src="https://thumbs.gfycat.com/JoyfulAfraidAltiplanochinchillamouse.webp" width="48" class="mx-auto my-6">
			<div class="mb-8 px-6">
				<div class="field-row" class="w-full">
					<label for="range22">Introvert</label>
					<input id="range22" type="range" min="0" max="10" value="5" />
					<label for="range23">Extrovert</label>
				</div>
			</div>
			<fieldset>
				<div class="grid grid-cols-4 gap-2">
					<img src="https://images-na.ssl-images-amazon.com/images/I/81IIHrrH7PL._AC_SX425_.jpg">
					<img src="https://images-na.ssl-images-amazon.com/images/I/6123EInXGSL._SX355_.jpg">
					<img src="https://images-na.ssl-images-amazon.com/images/I/81opIAmQheL._SY355_.jpg">
					<img src="https://target.scene7.com/is/image/Target/GUEST_07c8eaaa-9476-472d-848c-4905b2eefab8?wid=488&hei=488&fmt=pjpeg">
					<img src="https://images-na.ssl-images-amazon.com/images/I/81D%2BwuLfeIL._SX355_.jpg">
					<img src="https://images-na.ssl-images-amazon.com/images/I/51TNtUvN9%2BL._SY355_.jpg">
					<img src="https://images-na.ssl-images-amazon.com/images/I/41mBk7mfpaL.jpg">
					<img src="https://m.media-amazon.com/images/I/81wgMdbU+UL._SS500_.jpg">
				</div>
			</fieldset>
			<!-- <img src="https://miro.medium.com/max/918/0*rpB-jsFlnH9ZbzII" width="100" class="mx-auto my-2"> -->
		</div>
	</div>
</body>
<!-- partial -->

</body>
</html>
