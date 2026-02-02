<x-sidebar title="Profile Settings">
    <div class="dashboard-content" style="padding: 20px; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 80vh;">
        
        @if(session('success'))
            <div style="padding: 15px; background-color: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 20px; width: 100%; max-width: 500px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="task-form" style="background: #f9f9f9; padding: 40px; border-radius: 12px; height: 80vh; width: 80%; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
            <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div style="margin-bottom: 20px; text-align: center;">
                    <label style="display:block; margin-bottom:10px; font-weight: bold;">Profile Image</label>
                    
                    <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/default-avatar.png') }}" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #4CAF50; margin-bottom: 10px;">
                    
                    <input type="file" name="image" style="display: block; margin: 0 42%; font-size: 12px;">
                    
                    @error('image') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label style="display:block; margin-bottom:5px; font-weight: bold;">Username</label>
                    <input type="text" name="name" value="{{ $user->name }}" required 
                           style="height: 45px; width: 100%; padding: 0 15px; border-radius: 6px; border: 1px solid #ccc; box-sizing: border-box;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display:block; margin-bottom:5px; font-weight: bold;">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" required 
                           style="height: 45px; width: 100%; padding: 0 15px; border-radius: 6px; border: 1px solid #ccc; box-sizing: border-box;">
                </div>

                <div style="margin-bottom: 25px;">
                    <label style="display:block; margin-bottom:5px; font-weight: bold;">New Password (leave blank to keep current)</label>
                    <input type="password" name="password" placeholder="New Password"
                           style="height: 45px; width: 100%; padding: 0 15px; border-radius: 6px; border: 1px solid #ccc; box-sizing: border-box;">
                </div>

                @error('name' ?? 'email')
                    <span style="color: red;">{{ $message }}</span>
                    <br>
                    <br>
                @enderror

                <div style="text-align: center; display: flex; flex-direction: column; align-items: center; gap: 15px;">
                    <button type="submit" style="background-color: #007bff; padding: 12px 30px; border: none; border-radius: 6px; color: #ffffff; cursor: pointer; font-weight: bold; width: 200px;">
                        Save Changes
                    </button>
                    
                    <a href="{{ route('dashboard') }}" style="background-color: rgb(244, 119, 119); padding: 12px 30px; border-radius: 6px; color: #ffffff; text-decoration: none; font-weight: bold; width: 200px; text-align: center; box-sizing: border-box;">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-sidebar>