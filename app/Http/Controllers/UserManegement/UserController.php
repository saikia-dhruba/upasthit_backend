<?php

namespace App\Http\Controllers\UserManegement;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->latest()->get();
        return view('user-management.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('user-management.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // 1. Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            // 'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB Max
            'roles' => 'required|array'
        ]);

        // 2. Handle the avatar upload
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            // IMPORTANT: Run `php artisan storage:link` for this to be publicly accessible
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }
        $username = ""; // Initialize username variable

        // 3. Generate a random password
        $password = Str::random(12);
        $username = $this->generateUserId(); // Use the custom method to generate a unique username

        // 4. Create the user
        $user = User::create([
            'name' => $request->name,
            'username' => $username, // Use the custom method to generate a unique username
            'email' => $request->email,
            'password' => Hash::make($password), // Use the hashed generated password
            'phone' => $request->phone,
            'address' => $request->address,
            'avatar' => $avatarPath,
        ]);

        // 5. Assign roles
        $user->assignRole($request->roles);

        // 6. Send the notification with the plain-text password
        // try {
        //     $user->notify(new UserCreatedWithPassword($user, $password));
        // } catch (\Exception $e) {
        //     Log::error('Failed to send user creation notification: ' . $e->getMessage());
        //     // For now, we'll just ignore it and proceed
        // }

        return redirect()->route('user.users.index')->with('success', 'User created successfully. Login credentials sent to email.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        return view('user-management.users.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Update validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'roles' => 'required|array'
        ]);

        // Get all input except password and avatar
        $input = $request->except(['password', 'avatar']);

        // Handle password update
        if (!empty($request->password)) {
            $input['password'] = Hash::make($request->password);
        }

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Optional: Delete the old avatar if it exists
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            $input['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($input);
        $user->syncRoles($request->roles);

        return redirect()->route('user.users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index')->with('error', 'You cannot delete your own account.');
        }

        // Optional: Prevent deleting the last user with the 'Admin' role
        if ($user->hasRole('Admin') && User::role('Admin')->count() === 1) {
            return redirect()->route('users.index')->with('error', 'Cannot delete the last administrator.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    const PREFIX = 'SWF';
    public function generateUserId()
    {

        // 1. Get the current month and year parts
        $month = date('m');
        $year = date('y');
        $prefix = self::PREFIX . $month . $year;

        // 2. Find the last user created with this month's prefix
        // This is safer than counting, especially with concurrent requests.
        $latestUser = User::where('username', 'like', $prefix . '%')
            ->orderBy('username', 'desc')
            ->first();

        $newNumber = 1;

        if ($latestUser) {
            // 3. Extract the last 4 digits, convert to an integer, and increment
            $lastFourDigits = substr($latestUser->username, -4);
            $newNumber = (int)$lastFourDigits + 1;
        }

        // 4. Pad the new number with leading zeros to make it 4 digits long
        $paddedNumber = str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        return $prefix . $paddedNumber;
    }
}
