<?php 
    require 'layout/header.php';
    require 'lib/functions.php';
    require 'layout/navbar.php';
?>

<?php 
    $fruits = getFruits(4);
    $headings = [
        'Look at all my fruit!',
        'Bursting with fruit!',
        "We hope you've got a fruit tooth..."
    ];
    $randomHeadings = shuffle($headings);
    // scan($headings);
?>
<!-- Background image -->
<div
    class="p-12 text-center relative overflow-hidden bg-no-repeat bg-cover"
    style="
      background-image: url('https://images.unsplash.com/photo-1484980859177-5ac1249fda6f?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1529');
      height: 400px;
    "
  >
    <div
      class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
      style="background-color: rgba(0, 0, 0, 0.6)"
    >
      <div class="flex justify-center items-center h-full">
        <div class="text-white">
          <h2 class="font-semibold font-mono text-4xl mb-4">Things are about to get fruity...</h2>
          <h4 class="font-semibold font-mono text-xl mb-6">Welcome to the fruits project</h4>
          <a
            class="inline-block px-7 py-3 mb-1 border-2 border-gray-200 text-gray-200 font-medium text-sm leading-snug uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
            href="#!"
            role="button"
            data-mdb-ripple="true"
            data-mdb-ripple-color="light"
            >View Fruits</a
          >
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->


<body>
    <div class="px-20 pt-10">
        <!-- Fun randomised heading -->
        <div class="">
            <h1 class="text-3xl font-bold font-mono pb-5"><?php echo $headings[0] ?></h1>
        </div>
        <!-- Fun randomised heading -->

        <div class="pt-10 grid grid-cols-3 gap-4">
            <?php foreach ($fruits as $f) { ?>                

                
                <div class="grid grid-rows-1 gap-2">
                    <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <a href="show.php?id=<?php echo $f['id'] ?>">
                            <img class="rounded-t-lg" src="images/<?php echo $f['image']; ?>" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="show.php?id=<?php echo $f['id'] ?>">
                                <h5 class="mb-2 text-2xl font-mono tracking-tight text-gray-900 dark:text-white"><?php echo $f['name'] ?></h5>
                            </a>
                            <p class="mb-3 font-mono text-gray-700 dark:text-gray-400"><?php echo $f['bio'] ?></p>
                        </div>
                    </div>
                </div>
            
        
            <?php } ?>

           
        </div>
        
    </div>
    
</body>

<?php 
    require 'layout/footer.php';
?>

