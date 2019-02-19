# Laravel Camcoder
Laravel package to generate video using images and audio.

**Installation**
-

Step 1. Install FFMPEG 4.1 and verify

```
ffmpeg -version
```

Step 2. Install package using Composer

```
composer require "eyuva/laravel-camcorder":"*"
```

Step 3. Publish configurations for Camcorder

```
php artisan vendor:publish
``````

Step 4. Start Using the package

```
Done!
```


**Usage**
-


Step 1. Init

```
$camcorder = new Camcorder();
```
Step 2. Add Images

```
$camcorder->addImage(<image_path>,<duration>,<is_last=0>);
```

Step 3. Add Audio

```
$camcorder->addAudio(<audio_path>);
```

Step 4. Generate Video

```
$camcorder->generate(<output_path>,<file_name>);
```

Step 5. Use video file generated as you want.

```
Done!
```

**Demo**
-
Use this laravel project for the demo [Github](https://github.com/eyuva/laravel-camcorder).


**Contribute**
-

Contributions are welcome and will be fully credited. We accept contributions via Pull Requests on [GitHub](https://github.com/eyuva/laravel-camcorder).

**Loveware**
-

If you **Love It** then **Star It**

**Contributors**
-

* [Vishal Sancheti](https://github.com/v1shky)

**License**
-

The code in this repo are open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
