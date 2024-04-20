<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule; 
use Dompdf\Dompdf;

class UserController extends Controller
{
    private function generatePDF($view, $data, $filename)
    {

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view($view, $data)->render());
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream($filename);
    }

    public function exportUsersPDF(Request $request)
    {
        $query = User::query();

        // Lakukan filter berdasarkan kata kunci pencarian
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('fullname', 'like', '%' . $search . '%')
                  ->orWhere('username', 'like', '%' . $search . '%')
                  ->orWhere('role', 'like', '%' . $search . '%')
                  ->orWhere('address', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $users = $query->get();

        return $this->generatePDF('pdf.user', compact('users'), 'users.pdf');
    }

    public function userlist(Request $request)
    {
        $query = User::query();

        // Lakukan filter berdasarkan kata kunci pencarian
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('fullname', 'like', '%' . $search . '%')
                  ->orWhere('username', 'like', '%' . $search . '%')
                  ->orWhere('role', 'like', '%' . $search . '%')
                  ->orWhere('address', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $users = $query->get();

        return view('User.userlist', compact('users'));
    }

    public function add()
    {
        return view('User.add');
    }

    public function edit($id)
    {
        $users = User::where('id', $id)->first();
        return view('User.edit', compact('users'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'fullname' => 'required|min:3|max:30',
            'username' => 'required',
            'email' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('userlist')->with('success', "Berhasil mmebuat akun");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required|min:3|max:30',
            'username' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'password' => 'nullable',
            'role' => ['required', Rule::in(['admin', 'petugas', 'peminjam'])], 
        ]);

        $userData = [
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address,
            'role' => $request->role,
        ];

        // Hanya jika ada kata sandi yang diberikan, kita tambahkan ke array data pengguna
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        User::where('id', $id)->update($userData);

        return redirect()->route('userlist')->with('success', "Berhasil memperbarui user");
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
