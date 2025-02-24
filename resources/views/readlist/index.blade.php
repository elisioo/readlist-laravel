<x-app-layout>
    <h2>Book List</h2>
    <a href="#" class="add-contact" onclick="openPopup()">Add New Book</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Author</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @if ($readlists->count())
            @foreach ($readlists as $row)
                <tr>
                <td>{{ $row->Title }}</td>
                <td>{{ $row->Description }}</td>
                <td>{{ $row->Author }}</td>


                    <td>
                        <div class="actions">
                        <button class="edit_btn" 
                                data-id="{{ $row->id }}" 
                                data-title="{{ $row->Title  }}" 
                                data-description="{{ $row->Description}}" 
                                onclick="openEditPopup(this)">Edit</button>

                            <a href="delete_contact.php?id={{ $row->id }}">
                                <button class="delete_btn">Delete</button>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr><td colspan="6">No books found.</td></tr>
        @endif
    </table>

    <!-- Add Book Popup -->
    <div id="overlay" class="overlay" onclick="closePopup()"></div>
    <div id="popup" class="popup">
        <h2>Add New Book</h2>
        <form action="{{ route('readlist.store') }}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Book Title" required>
            <input type="text" name="description" placeholder="Description" required>
            <input type="text" name="author" placeholder="Author" required>
            <input type="text" name="status" placeholder="Status">
            <button type="submit">Add Book</button>
            <button type="button" onclick="closePopup()">Cancel</button>
        </form>
    </div>

    <!-- Edit Book Popup -->
    <div id="editOverlay" class="overlay" onclick="closeEditPopup()"></div>
    <div id="editPopup" class="popup">
        <h2>Edit Book</h2>
        <form action="update.php" method="POST">
            <input type="hidden" id="editBookId" name="book_id">
            <input type="text" id="editTitle" name="title" placeholder="Title" required>
            <input type="text" id="editDescription" name="description" placeholder="Description" required>
            <input type="text" id="editAuthor" name="author" placeholder="Author" required>
            <input type="text" id="editStatus" name="status" placeholder="Status">
            <button type="submit">Save Changes</button>
            <button type="button" onclick="closeEditPopup()">Cancel</button>
        </form>
    </div>

    <script>
        function openPopup() {
            document.getElementById("popup").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }

        function closePopup() {
            document.getElementById("popup").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }

        function openEditPopup(button) {
            let bookData = button.closest("td").querySelector(".book-data");

            document.getElementById("editBookId").value = bookData.dataset.id;
            document.getElementById("editTitle").value = bookData.dataset.title;
            document.getElementById("editDescription").value = bookData.dataset.description;
            document.getElementById("editAuthor").value = bookData.dataset.author;

            document.getElementById("editPopup").style.display = "block";
            document.getElementById("editOverlay").style.display = "block";
        }

        function closeEditPopup() {
            document.getElementById("editPopup").style.display = "none";
            document.getElementById("editOverlay").style.display = "none";
        }
    </script>
</x-app-layout>
