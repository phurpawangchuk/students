  <div class="container mt-4">
      <div class="rounded-lg bg-white p-6">
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th>Title</th>
                      <th>Content</th>
                      <th>Image</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($posts as $post)
                  <tr>
                      <td>{{ $post->title }}</td>
                      <td>{{ Str::limit($post->content, 50) }}</td>
                      <td>
                          @if ($post->image)
                          <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="100">
                          @endif
                      </td>

                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>

  </div>