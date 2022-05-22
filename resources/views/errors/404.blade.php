@extends('errors::layout')

<style>
  .error-page {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  h2 {
    margin-top: 4rem;
    color: #6C63FF;
  }

  a {
    padding: .75rem 1.5rem;
    border-radius: .25rem;
    background-color: #6C63FF;
    color: white;
  }

</style>

@section('message')
  <main class="error-page">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" width="488.229" height="324.196" viewBox="0 0 488.229 324.196">
        <g id="Group_20" data-name="Group 20" transform="translate(-0.005)">
          <path id="Path_354" data-name="Path 354" d="M518.046,311.267c-4.353-7.2-9.512-14.887-17.59-17.238-9.356-2.723-18.966,2.686-27.118,8.023a790.2,790.2,0,0,0-70.324,51.814l.024.28,52.477-3.619c12.638-.872,25.711-1.863,36.879-7.842,4.238-2.269,8.369-5.3,13.172-5.51,5.967-.262,11.169,3.9,15.258,8.258,24.185,25.754,31.183,65.137,58.316,87.763A861.071,861.071,0,0,0,518.046,311.267Z" transform="translate(-270.71 -220.149)" fill="#dde9ff"/>
          <path id="Path_355" data-name="Path 355" d="M622.469,516.9c-2.674-3.377-3.767-4.168-6.405-7.576q-32.221-41.673-60.57-86.16-19.256-30.215-36.6-61.589-8.258-14.916-16.063-30.066-6.057-11.747-11.843-23.635c-1.1-2.264-2.175-4.538-3.242-6.817-2.513-5.36-4.98-10.745-7.628-16.032-3.018-6.026-6.692-12.343-12.234-16.391a16.691,16.691,0,0,0-8.7-3.346c-4.511-.291-8.674,1.571-12.587,3.606a405.2,405.2,0,0,0-79.677,54.944A414.808,414.808,0,0,0,302.189,395.7c-.572.817-1.925.036-1.348-.786q3.411-4.824,6.957-9.543a417.1,417.1,0,0,1,106.486-99.326q10.358-6.713,21.106-12.8c3.611-2.045,7.238-4.064,10.928-5.958,3.617-1.858,7.457-3.528,11.588-3.591,14.06-.219,21.34,15.7,26.341,26.419q2.357,5.058,4.772,10.085,9.124,19.084,18.951,37.82,6.065,11.568,12.4,23,19.7,35.6,41.878,69.759c19.586,30.165,39.016,56.813,61.329,85.021C624.186,516.581,623.088,517.695,622.469,516.9Z" transform="translate(-226.473 -207.348)" fill="#e4e4e4"/>
          <path id="Path_356" data-name="Path 356" d="M318.724,336.172c-.817-.911-1.629-1.821-2.451-2.732-6.484-7.171-13.441-14.258-22.344-18.369a32.417,32.417,0,0,0-13.581-3.148,38.759,38.759,0,0,0-14.1,3.075c-2.123.848-4.2,1.811-6.244,2.836-2.337,1.176-4.631,2.43-6.916,3.695q-6.432,3.559-12.7,7.431-12.465,7.7-24.15,16.584-6.057,4.605-11.864,9.512-5.4,4.558-10.584,9.361c-.739.682-1.842-.422-1.1-1.1.911-.848,1.832-1.691,2.753-2.524q3.9-3.528,7.93-6.921,7.345-6.2,15.07-11.916,12.013-8.9,24.852-16.589,6.416-3.84,13.009-7.358c1.327-.708,2.67-1.4,4.028-2.055a64.2,64.2,0,0,1,9.575-3.9,34.061,34.061,0,0,1,14.461-1.421,37.649,37.649,0,0,1,13.342,4.616c8.742,4.886,15.522,12.442,22.12,19.815C320.493,335.813,319.4,336.922,318.724,336.172Z" transform="translate(-179.665 -227.542)" fill="#e4e4e4"/>
          <path id="Path_357" data-name="Path 357" d="M729.756,473.6l20.948-7.662,10.4-3.8a106.359,106.359,0,0,1,10.268-3.536,16.2,16.2,0,0,1,9.294.118,21.421,21.421,0,0,1,7.249,4.494,58.834,58.834,0,0,1,5.946,6.35c2.264,2.721,4.5,5.471,6.736,8.212q13.874,16.967,27.565,34.081t27.2,34.373q13.542,17.3,26.9,34.747,1.636,2.137,3.269,4.277c.6.788,1.958.011,1.348-.788q-13.454-17.622-27.1-35.1-13.675-17.519-27.539-34.889t-27.915-34.589q-3.5-4.29-7.013-8.57c-1.975-2.407-3.928-4.84-6.094-7.081-3.976-4.112-8.944-7.747-14.891-7.845-3.5-.058-6.88,1.052-10.129,2.227-3.5,1.267-7,2.558-10.493,3.837l-21.094,7.715-5.274,1.929c-.936.342-.532,1.852.415,1.505Z" transform="translate(-411.578 -290.662)" fill="#e4e4e4"/>
          <path id="Path_358" data-name="Path 358" d="M340.432,331.867a33.819,33.819,0,0,0-34.06,2.436,485.793,485.793,0,0,1,55.27,12.9C354.1,342.784,348.2,335.862,340.432,331.867Z" transform="translate(-228.925 -235.315)" fill="#dde9ff"/>
          <path id="Path_359" data-name="Path 359" d="M304.627,338.784l-2.049,1.666c.693-.583,1.414-1.13,2.154-1.647Z" transform="translate(-227.284 -239.815)" fill="#f2f2f2"/>
          <path id="Path_360" data-name="Path 360" d="M823.737,482.155c-2.062-2.51-4.292-5.138-7.376-6.158l-2.88.114a326.63,326.63,0,0,0,87,99.459Z" transform="translate(-448.188 -299.143)" fill="#dde9ff"/>
          <path id="Path_361" data-name="Path 361" d="M514.614,450.367a21.276,21.276,0,0,0,8.475,11.9c1.6,1.09,3.495,2.135,4.042,3.993a4.756,4.756,0,0,1-.5,3.491,14.124,14.124,0,0,1-2.192,2.862l-.078.291c-3.972-2.354-7.752-5.332-9.946-9.395s-2.5-9.388.194-13.138" transform="translate(-318.129 -288.06)" fill="#f2f2f2"/>
          <path id="Path_362" data-name="Path 362" d="M747.614,653.367a21.275,21.275,0,0,0,8.475,11.9c1.6,1.09,3.495,2.135,4.042,3.993a4.756,4.756,0,0,1-.5,3.491,14.124,14.124,0,0,1-2.192,2.862l-.078.291c-3.972-2.354-7.752-5.332-9.946-9.395s-2.5-9.388.194-13.138" transform="translate(-418.873 -375.833)" fill="#f2f2f2"/>
          <path id="Path_363" data-name="Path 363" d="M282.614,639.367a21.275,21.275,0,0,0,8.475,11.9c1.6,1.09,3.495,2.135,4.042,3.993a4.756,4.756,0,0,1-.5,3.491,14.123,14.123,0,0,1-2.192,2.862l-.078.291c-3.972-2.354-7.752-5.332-9.946-9.395s-2.5-9.388.194-13.138" transform="translate(-217.818 -369.78)" fill="#f2f2f2"/>
          <circle id="Ellipse_48" data-name="Ellipse 48" cx="28.949" cy="28.949" r="28.949" transform="translate(339.581)" fill="#3869ba"/>
          <path id="Path_364" data-name="Path 364" d="M867.793,176.077c-14.03-1.9-30.047,5.687-33.683,19.369a12.259,12.259,0,0,0-23.326,1.2l1.606,1.15a211.312,211.312,0,0,0,91.194-.412C893.824,187.125,881.823,177.973,867.793,176.077Z" transform="translate(-447.022 -169.339)" fill="#dde9ff"/>
          <path id="Path_365" data-name="Path 365" d="M761.793,244.077c-14.03-1.9-30.047,5.687-33.683,19.369a12.259,12.259,0,0,0-23.326,1.2l1.606,1.15a211.311,211.311,0,0,0,91.194-.412C787.824,255.125,775.823,245.973,761.793,244.077Z" transform="translate(-401.19 -198.741)" fill="#dde9ff"/>
          <path id="Path_366" data-name="Path 366" d="M656.5,227.722a.557.557,0,0,1-.171-.027C506.244,180.232,373.966,186.439,289.427,200c-11.5,1.845-23.04,3.977-34.287,6.335-2.871.6-5.85,1.246-8.853,1.917-3.587.8-7.126,1.621-10.519,2.444q-2.2.521-4.311,1.049c-2.133.527-4.3,1.075-6.618,1.678-2.593.669-5.227,1.37-7.832,2.084l-.029.008h0c-2.942.8-5.868,1.63-8.7,2.455-1.532.442-3.011.879-4.427,1.309-.158.044-.3.086-.441.129l-.3.093c-.176.054-.35.106-.524.156l-.011,0h0l-.461.143c-.549.166-1.085.329-1.613.491-13.932,4.295-21.591,7.35-21.667,7.38a.568.568,0,1,1-.422-1.054c.076-.03,7.773-3.1,21.756-7.412.529-.162,1.067-.325,1.618-.492l.428-.133.044-.014c.173-.049.346-.1.522-.155l.3-.093c.152-.046.3-.091.455-.134,1.407-.428,2.891-.865,4.426-1.309,2.831-.826,5.76-1.652,8.7-2.457l.028-.008h0c2.614-.717,5.258-1.421,7.859-2.091,2.324-.6,4.493-1.154,6.63-1.681q2.122-.528,4.319-1.052c3.4-.824,6.944-1.647,10.537-2.448,3.008-.672,5.992-1.318,8.867-1.92,11.263-2.363,22.817-4.5,34.339-6.345,84.66-13.584,217.127-19.8,367.423,27.731a.567.567,0,0,1-.171,1.109Z" transform="translate(-173.443 -175.088)" fill="#ccc"/>
          <path id="Path_367" data-name="Path 367" d="M350.58,538.637a3.819,3.819,0,0,0-.965-1.516,3.647,3.647,0,0,0-.522-.4,4.363,4.363,0,0,0-5.1,0,3.3,3.3,0,0,0-.392.4q-.63.775-1.294,1.516c-.727.829-1.47,1.629-2.248,2.407-.221.216-.443.437-.67.653-.131.13-.261.255-.392.38-.5.477-1.01.937-1.527,1.391-.272.244-.545.482-.823.715-.414.346-.829.693-1.249,1.027-.04.028-.079.057-.119.091-.011.006-.017.017-.028.023s-.011,0-.017.011a.1.1,0,0,0-.04.028c-.125.085-.21.142-.272.193.023-.011.045-.028.068-.04-.1.079-.21.159-.312.238-.993.732-2.009,1.436-3.048,2.094a56.3,56.3,0,0,1-8.072,4.286c-.187.074-.38.153-.573.227a48.8,48.8,0,0,1-23.187,3.417q-1.209-.094-2.418-.255c-.931-.136-1.856-.3-2.776-.488a55.588,55.588,0,0,1-10.229-3.088,67.351,67.351,0,0,1-11.727-6.88c-.568-.4-1.141-.806-1.714-1.2.653-1.6,1.294-3.2,1.919-4.813.312-.778.613-1.555.908-2.339,2.322-6.034,4.5-12.124,6.59-18.238q3.167-9.289,5.977-18.686.289-.954.562-1.907,1.473-4.964,2.827-9.95c.085-.323.176-.641.255-.965q.392-1.43.766-2.861a4.257,4.257,0,1,0-8.208-2.265c-.244.92-.488,1.833-.738,2.753q-1.8,6.667-3.78,13.288l-.579,1.907q-4.376,14.423-9.61,28.557-.63,1.711-1.277,3.411c-.21.556-.42,1.113-.636,1.669-.414,1.1-.84,2.191-1.266,3.286-.244.641-.494,1.283-.744,1.919-.165.4-.324.806-.482,1.2a23.731,23.731,0,0,0-5-1.2l-.272-.034a15.552,15.552,0,0,0-3.979.034,13.574,13.574,0,0,0-9.786,6.051c-2.708,4.263-2.673,10.359,1.124,13.981,3.911,3.729,9.831,3.7,14.435,1.368a16.092,16.092,0,0,0,5.971-5.6,28.7,28.7,0,0,0,1.555-2.64c.119.08.238.159.358.244.454.318.908.641,1.357.959a63.421,63.421,0,0,0,8.236,5.057A61.509,61.509,0,0,0,297.065,564c.153.017.3.04.454.057.755.1,1.516.17,2.276.233a58.909,58.909,0,0,0,31.548-6.448q1.235-.639,2.446-1.34,1.882-1.09,3.678-2.316c.653-.443,1.289-.891,1.919-1.362a57.349,57.349,0,0,0,7.669-6.783q1.337-1.4,2.56-2.9a4.576,4.576,0,0,0,1.249-3.008A4.294,4.294,0,0,0,350.58,538.637Zm-93.993,13.521c.119-.085.238-.176.352-.267C256.906,551.976,256.741,552.072,256.588,552.158Zm1.822-1.833c-.131.148-.25.3-.38.443a13.263,13.263,0,0,1-1.277,1.249c-.062.057-.131.114-.2.165l0,0a.006.006,0,0,0,0,0,2.152,2.152,0,0,0-.238.125q-.366.221-.749.409a9.65,9.65,0,0,1-1.538.426,9.537,9.537,0,0,1-1.209.011H252.8a8.419,8.419,0,0,1-.823-.227c-.136-.068-.267-.148-.4-.227-.051-.045-.1-.091-.125-.119a1.387,1.387,0,0,1-.153-.165.006.006,0,0,0,0,0l0,0c-.062-.114-.131-.227-.193-.341a.018.018,0,0,1-.006-.011c-.045-.142-.085-.289-.119-.437a7.1,7.1,0,0,1,.006-.778,7.638,7.638,0,0,1,.306-1.067,6.28,6.28,0,0,1,.392-.715c.011-.023.068-.114.131-.216.006-.006.006-.006.006-.011.085-.1.17-.2.261-.289.153-.17.318-.318.482-.471a10.238,10.238,0,0,1,.993-.573,11.059,11.059,0,0,1,1.663-.448,14.181,14.181,0,0,1,2.5.023,17.2,17.2,0,0,1,2.327.573,20.961,20.961,0,0,1-1.572,2.577C258.455,550.262,258.432,550.3,258.41,550.324Zm-6.312-1.867a1.239,1.239,0,0,1-.176.221.8.8,0,0,1,.176-.221Z" transform="translate(-201.3 -300.326)" fill="#3f3d56"/>
          <path id="Path_368" data-name="Path 368" d="M393.394,478.893l-.153,5.347q-.162,5.934-.335,11.875-.179,6.684-.375,13.362-.094,3.448-.193,6.9-.264,9.289-.522,18.573c-.017.641-.04,1.277-.057,1.919q-.128,4.606-.255,9.212-.145,5-.284,10-.1,3.746-.21,7.5l-1.533,54.373a4.341,4.341,0,0,1-4.257,4.257,4.292,4.292,0,0,1-4.257-4.257q.426-15.292.863-30.583.383-13.827.778-27.655.128-4.555.255-9.116.2-6.863.386-13.725c.017-.641.04-1.277.057-1.919.011-.562.028-1.118.045-1.68q.375-13.325.749-26.656.153-5.245.3-10.5.17-5.986.341-11.965c.051-1.754.1-3.5.148-5.256a4.341,4.341,0,0,1,4.257-4.257A4.292,4.292,0,0,1,393.394,478.893Z" transform="translate(-261.176 -298.554)" fill="#3f3d56"/>
          <path id="Path_369" data-name="Path 369" d="M783.786,481.847A507.032,507.032,0,0,1,767.8,531.765c-1.707,4.511-3.453,9.012-5.319,13.459l.429-1.017a30.981,30.981,0,0,1-3.173,6.023q-.13.182-.265.361.662-.846.251-.334c-.144.171-.287.342-.436.508a13.426,13.426,0,0,1-1.276,1.251q-.171.146-.347.286l.532-.414c-.062.146-.5.339-.63.422A10.378,10.378,0,0,1,756.2,553l1.017-.429a10.828,10.828,0,0,1-2.4.659l1.132-.152a9.664,9.664,0,0,1-2.44.026l1.132.152a7.951,7.951,0,0,1-1.933-.521l1.017.429a6.816,6.816,0,0,1-.953-.509c-.154-.1-.627-.459-.008.014.643.492.083.042-.05-.088-.11-.109-.21-.227-.318-.338-.5-.513.566.884.225.283a10.3,10.3,0,0,1-.5-.929l.429,1.017a6.771,6.771,0,0,1-.413-1.505l.152,1.132a7.746,7.746,0,0,1,0-1.933l-.152,1.132a9.062,9.062,0,0,1,.565-2.089l-.429,1.017a9.489,9.489,0,0,1,.669-1.3,3.821,3.821,0,0,1,.413-.608c.028.009-.72.859-.323.43.1-.112.2-.23.306-.342.168-.178.348-.341.525-.51.593-.564-.83.548-.146.1a10.819,10.819,0,0,1,1.561-.851l-1.017.429a11.53,11.53,0,0,1,2.835-.761l-1.132.152a14.546,14.546,0,0,1,3.667.043L758.5,547a18.849,18.849,0,0,1,4.479,1.26l-1.017-.429a47.359,47.359,0,0,1,8.474,5.176,63.543,63.543,0,0,0,8.234,5.056,61.524,61.524,0,0,0,19.652,5.945,59,59,0,0,0,52.554-20.861,4.584,4.584,0,0,0,1.247-3.01,4.332,4.332,0,0,0-1.247-3.01c-1.562-1.434-4.512-1.839-6.021,0a54.282,54.282,0,0,1-4.6,4.954q-1.145,1.086-2.351,2.106-.689.582-1.4,1.142c-.223.176-.919.646.149-.112-.245.174-.48.364-.721.542a56.349,56.349,0,0,1-11.541,6.564l1.017-.429a54.962,54.962,0,0,1-13.72,3.759l1.132-.152a55.427,55.427,0,0,1-14.618-.022l1.132.152a56.654,56.654,0,0,1-14.109-3.843l1.017.429a65.857,65.857,0,0,1-12.338-7.147,49.318,49.318,0,0,0-6.308-3.97,24.307,24.307,0,0,0-8.2-2.491,14.131,14.131,0,0,0-13.763,6.085c-2.711,4.26-2.676,10.355,1.12,13.978,3.91,3.731,9.83,3.7,14.438,1.365,4.437-2.247,7.1-6.917,8.977-11.319,4.218-9.908,7.953-20.045,11.432-30.233q5.163-15.12,9.365-30.546.52-1.911,1.026-3.825a4.258,4.258,0,0,0-8.21-2.263Z" transform="translate(-418.033 -300.327)" fill="#3f3d56"/>
          <path id="Path_370" data-name="Path 370" d="M886.139,478.893l-1.532,54.374-1.524,54.091-.862,30.586a4.294,4.294,0,0,0,4.257,4.257,4.342,4.342,0,0,0,4.257-4.257l1.532-54.374,1.524-54.091.862-30.586a4.294,4.294,0,0,0-4.257-4.257,4.342,4.342,0,0,0-4.257,4.257Z" transform="translate(-477.909 -298.554)" fill="#3f3d56"/>
          <path id="Path_371" data-name="Path 371" d="M578.793,616.786h1.322V556.594h30.838v-1.319H580.115v-25.4H603.93q-.524-.666-1.078-1.315H580.115V511.788c-.437-.186-.878-.366-1.322-.536v17.31H552.88V507.07c-.444.02-.881.051-1.322.088v21.405H530.885V512.527c-.444.2-.881.4-1.315.62v15.416H512.191v1.315H529.57v25.4H512.191v1.319H529.57v60.192h1.315V556.594a20.67,20.67,0,0,1,20.673,20.677v39.515h1.322V556.594h25.913Zm-47.908-61.51v-25.4h20.673v25.4Zm21.995,0v-25.4h.519a25.4,25.4,0,0,1,25.394,25.4Z" transform="translate(-317.917 -312.578)" opacity="0.2"/>
          <path id="Path_372" data-name="Path 372" d="M598.367,646.311a35.792,35.792,0,0,1-11.381,19.129c-.42.363-.84.715-1.277,1.061q-1.592.145-3.162.3c-.868.079-1.726.165-2.577.244l-.153.017-.108-.931-.431-3.769a21.356,21.356,0,0,1-1.873-18.414c1.5-4.041,4.212-7.612,6.88-11.154,3.684-4.893,7.266-9.729,7.4-15.695a34.369,34.369,0,0,1,4.484,7.566,9.329,9.329,0,0,0-2.906,2.14c-.233.255-.465.613-.307.92.136.261.477.324.772.358l2.134.221c.568.062,1.135.119,1.7.182a36.319,36.319,0,0,1,1.391,6.914A34.729,34.729,0,0,1,598.367,646.311Z" transform="translate(-345.563 -360.151)" fill="#3f3d56"/>
          <path id="Path_373" data-name="Path 373" d="M620.131,642.319c-3.349,2.435-5.307,5.937-6.829,9.8a9.439,9.439,0,0,0-4.07,2.6c-.233.255-.465.613-.307.92.136.261.477.324.772.358l2.134.221c-1.521,4.564-2.918,9.286-5.608,13.141a21,21,0,0,1-6.829,6.193,21.85,21.85,0,0,1-2.282,1.13q-4.325.332-8.486.71-1.592.145-3.162.3c-.868.079-1.726.165-2.577.244q-.009-.468,0-.937a35.933,35.933,0,0,1,8.656-22.625c.255-.3.517-.585.783-.874a35.076,35.076,0,0,1,9.542-7.209,35.564,35.564,0,0,1,18.26-3.962Z" transform="translate(-348.483 -371.036)" fill="#3869ba"/>
          <path id="Path_374" data-name="Path 374" d="M577.5,663.838l-.653,1.93-.329.982c-.868.079-1.726.165-2.577.244l-.153.017-2.815.289c-.244-.284-.488-.573-.727-.868a35.21,35.21,0,0,1,4.581-49.445c-.749,3.922.125,7.68,1.561,11.409-.153.062-.3.125-.443.193a9.326,9.326,0,0,0-2.906,2.14c-.233.255-.465.613-.307.92.136.261.477.324.772.358l2.134.221c.568.062,1.135.119,1.7.182l.8.085c.04.085.074.165.114.25a68.95,68.95,0,0,1,4.342,10.688,24.8,24.8,0,0,1,.579,2.787A21.345,21.345,0,0,1,577.5,663.838Z" transform="translate(-339.531 -360.103)" fill="#3869ba"/>
          <path id="Path_375" data-name="Path 375" d="M600.453,528.511a62.885,62.885,0,0,0-21.361-23.445,64.844,64.844,0,0,0-29.836-10.433q-2.095-.19-4.2-.223c-1.658-.025-26.6,7.17-34.958,13.045a64.876,64.876,0,0,0-20.056,22.436A58.181,58.181,0,0,0,483.16,559.2a64.462,64.462,0,0,0,8.346,29.219,62.709,62.709,0,0,0,20.687,21.993c8.706,5.555,17.452,20.284,27.731,20.8,10.357.524,22.168-13.37,31.614-17.589a59.275,59.275,0,0,0,23.684-19.3,62.581,62.581,0,0,0,11.125-27.784,64.271,64.271,0,0,0-2.725-30.661,63.489,63.489,0,0,0-3.167-7.37,4.286,4.286,0,0,0-5.825-1.527,4.359,4.359,0,0,0-1.527,5.825q.89,1.753,1.655,3.563l-.429-1.017a57.413,57.413,0,0,1,3.9,14.5l-.152-1.132A62,62,0,0,1,598.041,565l.152-1.132a62.29,62.29,0,0,1-4.288,15.708l.429-1.017a59.153,59.153,0,0,1-3.787,7.435q-1.092,1.808-2.316,3.531c-.359.5-.728,1-1.1,1.494-.486.645.662-.842.16-.21l-.256.323q-.387.483-.784.958a53.141,53.141,0,0,1-5.776,5.894q-.775.677-1.577,1.323c-.266.215-.529.439-.806.638.011-.008.9-.681.372-.29-.165.123-.328.248-.494.37q-1.652,1.224-3.391,2.323a58.732,58.732,0,0,1-8.376,4.378l1.017-.429a61.992,61.992,0,0,1-15.664,4.286l1.132-.152a61.388,61.388,0,0,1-16.228.029l1.132.152a56.67,56.67,0,0,1-14.245-3.851l1.017.429a53.148,53.148,0,0,1-7.615-3.968q-1.8-1.135-3.51-2.411c-.162-.121-.324-.244-.485-.366-.52-.392.373.289.38.294a10.89,10.89,0,0,1-.871-.7q-.825-.672-1.624-1.375a57.9,57.9,0,0,1-5.956-6.079q-.689-.814-1.348-1.652c-.19-.242-.537-.732.229.3-.1-.136-.206-.269-.307-.4q-.367-.487-.724-.981-1.251-1.73-2.377-3.545a62.038,62.038,0,0,1-4.431-8.576l.429,1.017a60.5,60.5,0,0,1-4.167-15.233l.152,1.132a55.554,55.554,0,0,1-.027-14.551l-.152,1.132a53.741,53.741,0,0,1,3.743-13.6l-.429,1.017a57.653,57.653,0,0,1,4.084-7.865q1.172-1.886,2.485-3.681.3-.408.6-.81c.184-.243.69-.848-.173.221.085-.1.166-.212.249-.318q.72-.913,1.476-1.8a60.965,60.965,0,0,1,6.178-6.256q.837-.733,1.7-1.435.392-.319.79-.632c.106-.083.213-.165.319-.249-1.134.9-.315.246-.058.053q1.779-1.333,3.653-2.532a58.837,58.837,0,0,1,8.734-4.6l-1.017.429c4.4-1.85,23.92-6.215,27.469-5.739l-1.132-.152a60.3,60.3,0,0,1,15.167,4.19l-1.017-.429a62.6,62.6,0,0,1,7.152,3.593q1.727,1.013,3.387,2.136.785.532,1.554,1.087.384.278.764.561l.421.317c.59.442-.813-.64-.194-.151a62.909,62.909,0,0,1,5.885,5.252q1.363,1.388,2.632,2.864.651.757,1.275,1.537c.207.258.911,1.193.048.048.211.28.424.558.633.839a55.614,55.614,0,0,1,4.763,7.685,4.288,4.288,0,0,0,5.825,1.527A4.358,4.358,0,0,0,600.453,528.511Z" transform="translate(-305.352 -307.104)" fill="#3f3d56"/>
          <path id="Path_376" data-name="Path 376" d="M563.352,618.072a2.146,2.146,0,0,1-1.555-3.719l.147-.584-.058-.14c-1.975-4.71-14.579,8.42-15.124,12.846a17.045,17.045,0,0,0,.3,5.862,68.337,68.337,0,0,1-6.216-28.383,65.966,65.966,0,0,1,.409-7.358q.339-3,.94-5.966a69.129,69.129,0,0,1,13.709-29.3c3.9.218,7.321-.377,7.651-7.938.059-1.345,1.056-2.51,1.276-3.835-.372.049-.751.079-1.124.1l-.354.018-.044,0a2.126,2.126,0,0,1-1.746-3.463l.483-.594c.244-.305.495-.6.739-.91a1.051,1.051,0,0,0,.079-.092c.281-.348.562-.69.843-1.038a6.147,6.147,0,0,0-2.015-1.948c-2.815-1.649-6.7-.507-8.732,2.04a11.109,11.109,0,0,0-1.716,9.3,24.63,24.63,0,0,0,3.407,7.6c-.153.2-.312.385-.464.58a69.579,69.579,0,0,0-7.262,11.5c.577-4.506-6.477-20.779-9.206-24.226a5.937,5.937,0,0,0-10.574,2.915q-.008.076-.016.152.608.343,1.19.728a2.91,2.91,0,0,1-1.173,5.3l-.059.009c-5.424,7.744,11.964,27.9,16.316,23.375a71.012,71.012,0,0,0-3.823,17.99,67.363,67.363,0,0,0,.049,10.876l-.018-.128c-.967-7.88-17.557-19.6-22.4-18.62-2.791.562-5.54.434-5.116,3.25l.021.135a19.545,19.545,0,0,1,2.192,1.056q.608.343,1.19.728a2.91,2.91,0,0,1-1.173,5.3l-.059.009-.122.018c-2.469,8.5,15.841,22.205,26.972,17.843h.006a71,71,0,0,0,4.769,13.923h17.037c.061-.189.116-.385.171-.574a19.357,19.357,0,0,1-4.714-.281c1.264-1.551,2.528-3.114,3.792-4.665a1.048,1.048,0,0,0,.079-.092c.641-.794,1.288-1.582,1.93-2.375h0a28.354,28.354,0,0,0-.831-7.223Zm-19.51-38.379.009-.012-.009.024Zm-3.774,34.019-.147-.33c.006-.238.006-.476,0-.721,0-.067-.012-.134-.012-.2.055.421.1.843.165,1.264Z" transform="translate(-317.855 -327.191)" fill="#3f3d56"/>
          <circle id="Ellipse_49" data-name="Ellipse 49" cx="6.244" cy="6.244" r="6.244" transform="translate(47.824 242.942)" fill="#3f3d56"/>
          <circle id="Ellipse_50" data-name="Ellipse 50" cx="6.244" cy="6.244" r="6.244" transform="translate(122.75 311.057)" fill="#3f3d56"/>
          <circle id="Ellipse_51" data-name="Ellipse 51" cx="6.244" cy="6.244" r="6.244" transform="translate(407.128 311.057)" fill="#3f3d56"/>
          <circle id="Ellipse_52" data-name="Ellipse 52" cx="6.244" cy="6.244" r="6.244" transform="translate(422.454 231.59)" fill="#3f3d56"/>
          <circle id="Ellipse_53" data-name="Ellipse 53" cx="6.244" cy="6.244" r="6.244" transform="translate(404.29 173.692)" fill="#3f3d56"/>
          <path id="Path_377" data-name="Path 377" d="M424.715,578.68a6.215,6.215,0,1,1-.119-1.226,6.215,6.215,0,0,1,.119,1.226Z" transform="translate(-274.719 -340.847)" fill="#3f3d56"/>
          <circle id="Ellipse_54" data-name="Ellipse 54" cx="6.244" cy="6.244" r="6.244" transform="translate(268.629 191.856)" fill="#3f3d56"/>
          <path id="Path_378" data-name="Path 378" d="M535.714,508.68a6.215,6.215,0,1,1-.119-1.226A6.215,6.215,0,0,1,535.714,508.68Z" transform="translate(-322.713 -310.58)" fill="#3f3d56"/>
          <path id="Path_379" data-name="Path 379" d="M393.715,476.68a6.215,6.215,0,1,1-.119-1.226A6.215,6.215,0,0,1,393.715,476.68Z" transform="translate(-261.315 -296.744)" fill="#3f3d56"/>
          <circle id="Ellipse_55" data-name="Ellipse 55" cx="6.244" cy="6.244" r="6.244" transform="translate(333.905 245.213)" fill="#3f3d56"/>
          <circle id="Ellipse_56" data-name="Ellipse 56" cx="9.082" cy="9.082" r="9.082" transform="translate(232.868 182.774)" fill="#3f3d56"/>
          <path id="Path_380" data-name="Path 380" d="M657.493,734.237l-486.878.174a.676.676,0,0,1,0-1.352l486.878-.174a.676.676,0,0,1,0,1.352Z" transform="translate(-169.934 -410.216)" fill="#cacaca"/>
        </g>
      </svg>
    </div>

    <h2 class="mt-5">@lang('http.page-not-found')</h2>

    <a class="mt-3 text-secondary-lighter" href="{{ route('home') }}">@lang('http.go-to-home')</a>
  </main>
@endsection
