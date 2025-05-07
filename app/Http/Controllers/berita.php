php public function index()
{
    $beritas = Berita::latest()->get(); // Atau gunakan pagination
    return view('berita.index', compact('beritas'));
}
