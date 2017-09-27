<html>
<link rel="stylesheet" type="text/css" href="/css/containers.css">

@include('app_part.banner')

<div class="maincontainer">

  <div class="filtercontrol">

    <table style="margin:auto;">
      <form method="get" action="/components/filtered">
      <tr>
        <td>Filter:</td>
        <td>Type</td>
        <td><select name="filter_types">
              <option value="none">None</option>
              @include('menus.types')
            </select>
        </td>
        <td>Vendor</td>
        <td><select name="filter_vendor">
              <option value="none">None</option>
              @include('menus.vendors')
            </select>
        </td>
        <td>
          <input type="submit" id="search_button" value="Search"/>
        </td>
        </form>
        <td>
          <button id="modal_open">New Component</button>
        </td>
      </tr>

    </table>

  </div>

  <div class="resultscontrol">
  <form method="post" action="/components">
  <table style="margin:auto">
    <tr>
      <td>Type</td>
      <td>Vendor</td>
      <td>Common Name</td>
      <td>Model Number</td>
    </tr>
    @foreach ($components as $component)
      <tr>
        <td>{{$component->type}}</td>
        <td>{{$component->name}}</td>
        <td>{{$component->easy_name}}</td>
        <td>{{$component->model}}</td>
        <td><input type="submit" value="Delete"/><input type="hidden" name="comp_id" value="{{$component->id}}"/></td>
      </tr>
    @endforeach
  </table>
  <input type="hidden" name="post_type" value="delete"/>
  {{ csrf_field() }}
  </form>
  </div>

<div class="modal_box" id="add_form">
  <div class="modal_content">
 <form method="post" action="/components">
  <table>
    <tr>
      <td>Type</td>
      <td>Vendor</td>
      <td>Common Name</td>
      <td>Model Number</td>
      <td/>
    <tr>
    <tr>
       <td>
        <select name="comp_type">
            @include('menus.types')
       </td>
        <td>
          <select name="vendor">
            @include('menus.vendors')
        </td>
        <td>
          <input type="text" name="common_name"/>
        </td>
        <td>
          <input type="text" name="model_number"/>
        </td>
        <td>
          <input type="submit" value="Add"/>
          <input type="hidden" value="new" name="post_type">
        </td>
    </tr>
  </table>
  {{ csrf_field() }}
  </form>
    </div>
  </div>
</div>

@include('app_part.modal_box_js')

</html>
