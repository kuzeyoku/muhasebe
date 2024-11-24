<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function __construct(private readonly UserService $service)
    {
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        try {
            $this->service->create($request->validated());
            return redirect()->back()->with('success', 'Kullanıcı Başarıyla Eklendi');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        try {
            $data = $request->validated();
            if ($request->password === null) {
                unset($data['password'], $data['password_confirmation']);
            }
            $this->service->update($data, $user);
            return redirect()->back()->with('success', 'Kullanıcı Başarıyla Güncellendi');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(User $user): RedirectResponse
    {
        try {
            if ($user->id === auth()->id()) {
                return redirect()->back()->with('error', 'Kendi Hesabınızı Silemezsiniz');
            }
            if (User::all()->count() === 1) {
                return redirect()->back()->with('error', 'En az bir kullanıcı olmalıdır');
            }
            $this->service->delete($user);
            return redirect()->back()->with('success', 'Kullanıcı Başarıyla Silindi');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
