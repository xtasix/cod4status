<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['accept'])) {
  // process data
  header('Location: page-2.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CoD4 Status - Installation</title>
<?php include_once("include_header.php");?>
</head>
<body>
<div class="container" role="main">
  <div class="row">
    <div class="col-md-10 col-sm-12 col-xs-12">
      <h1>CoD4 Status <small> CoD4 server status and screenshots viewer</small></h1>
      <hr class="colorgraph">
    </div>
  </div>
  <div class="divider-30 clearfix"></div>
  <div class="row">
    <div class="col-md-10 col-sm-12 col-xs-12 text-justify"> <img src="<?php home_url() ;?>assets/images/cod4.jpg" class="img-responsive pull-left margin-right-30">
      <p>CoD4 status is a php/mysql based website script for COD4x-MOD servers.</p>
      <p>In order to use this script you will need PHP 5.3 or higher and a mysql database.</p>
      <p>In order to use CoD4 Status you also need <a href="https://cod4x.me/" target="_blank">CoD4X Mod</a> with plugin "screenshotsender" for more help visit <a href="https://cod4x.me/forum/" target="_blank">CoD4X Mod Forum</a></p>
      <p>
      <h3 style="color:#f00">Footer credit links are required</h3>
      </p>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="divider-30 clearfix"></div>
  <div class="row">
    <div class="col-md-10 col-sm-12 col-xs-12">
      <form action="" method="post">
        <div class="form-group">
          <textarea rows="8" name="license" class="form-control">Copyright © 2016 CoD4 Status

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program. If not, see http://www.gnu.org/licenses/.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.</textarea>
        </div>
        <div class="form-group">
          <div class="checkbox">
            <label>
              <input type="checkbox" value="" name='accept' required>
              I have read, and accept the license</label>
          </div>
          <button class="btn btn-primary pull-right" type="submit">install CoD4 Status</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include("include_footer.php"); ?>
</body>
</html>
