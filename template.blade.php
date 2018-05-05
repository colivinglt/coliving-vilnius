<!DOCTYPE html>
<html lang="en">
<head>
    <?php
      $data = DB::table('templates')->get()->where('coliving_handle', $name)->first();
    ?>
    <meta charset="UTF-8">
    <title>Coliving {{$data->coliving_name}}</title>
    <link rel="stylesheet" type="text/css" href="inc/css/style.css">
</head>
<body>

<div class="wrapper">
    <!--Top phone number, button-->
    <div id="top-info">
        <div class="phone-number">{{$data->phone_number}}</div>
        <div class="button">Join Coliving {{$data->coliving_name}}</div>
        @if(\Auth::check() && \Auth::user()->id == $data->user_id)
        <div class="button" style="border: 1px solid #666666; color: #666666;">Edit page</div>
      @endif

    </div>
    <div class="content-background">
        <div class="logotype">
            <img src="inc/images/coliving-logotype.svg">
            <span style="display: block; text-align: right; font-size: 25px;">{{$data->coliving_name}}</span>
        </div>
        <div class="banner">
            <img src="/storage/{{$data->coliving_handle}}/{{$data->cover_picture_path}}" width="100%">
        </div>
        <div class="content">
            <h2>{{$data->pitch_title}}</h2>
            <?php echo nl2br($data->pitch_text); ?>
        </div>
    </div>
</div>
<div class="grey-block">
    <div class="wrapper">
        <div class="content">
            <?php echo '<h2>'.nl2br($data->room_situation).'</h2>' ?>
        </div>
        <div id="staff">
            <div class="people">
                <img src="inc/images/staff.svg" width="120px;">
                <h2>Laurynas</h2>
                <h4>Marketing and management</h4>
            </div>
            <div class="people">
                <img src="inc/images/staff.svg" width="120px;">
                <h2>Tomas</h2>
                <h4>Real estate and vlogging</h4>
            </div>
            <div class="people">
                <img src="inc/images/staff.svg" width="120px;">
                <h2>Aurelijus</h2>
                <h4>Real estate management</h4>
            </div>
            <div class="people">
                <img src="inc/images/staff.svg" width="120px;">
                <h2>Stasys</h2>
                <h4>Design and strategy</h4>
            </div>
            <div class="people">
                <img src="inc/images/staff.svg" width="120px;">
                <h2>Someone</h2>
                <h4>Something</h4>
            </div>
            <div class="people">
                <img src="inc/images/staff.svg" width="120px;">
                <h2>Someone</h2>
                <h4>Something</h4>
            </div>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="content-background" style="padding: 35px 25px; position: relative; top: -100px;">
        <div id="masonry-wrapper">
            <?php
                $folder = Storage::disk('local')->getAdapter()->getPathPrefix().$data->gallery_path;
                $files = scandir($folder);
                foreach($files as $file) {
                  if($file == "." || $file == "..") continue;
                  echo "<div class='thumbnail'><img src='/storage/gal/".$data->coliving_handle."/".$file."' width='300px'></div>";
                }
            ?>
        </div>
    </div>
</div>

<div class="grey-block" style="position: relative; top: -150px;">
    <div class="wrapper">
        <div class="content">
            <h2 style="width: 800px;">{{$data->project_situation}}</h2>
        </div>
        <div id="projects-block">
            <div class="project-content">
                <img src="/storage/{{$data->coliving_handle}}/{{$data->project_image_path}}" width="300px">
                <h1>{{$data->project_title}}</h1>
                {{$data->project_text}}
            </div>
            <div class="project-content">
              <img src="/storage/{{$data->coliving_handle}}/{{$data->project_image_path}}" width="300px">
              <h1>{{$data->project_title}}</h1>
                {{$data->project_text}}
            </div>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="content-background" style="position: relative; top: -200px;">
        <div class="logotype" style="top: -50px;">
            <span style="margin-left: 25px; display: block; text-align: left; font-size: 25px; font-style: italic;">{{$data->join}}</span>
            <img src="inc/images/coliving-logotype.svg">
            <span style="display: block; text-align: right; font-size: 25px;">{{$data->coliving_name}}</span>
        </div>
        <div class="banner">
            <img src="inc/images/001.jpg" width="100%">
        </div>
    </div>
</div>

</body>
</html>
