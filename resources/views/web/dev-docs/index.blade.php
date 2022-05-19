<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>dev docs</title>

  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

  <style>
    body {
      /* --color: white;
      background-color: #313131; */

      margin: 0;
      padding: 4rem;
    }

    section {
      margin-bottom: 2rem;
    }

    section h2 {
      font-size: 1.2rem;
      margin-bottom: .5rem;
      color: var(--color);
    }

  </style>
</head>

<body>
  {{-- badge --}}
  <section>
    <h2>badge</h2>
    <span class="badge badge-primary">primary</span>
    <span class="badge badge-success">success</span>
    <span class="badge badge-info">info</span>
    <span class="badge badge-warning">warning</span>
    <span class="badge badge-danger">danger</span>
  </section>

</body>

</html>
