import { Head, Link, usePage } from '@inertiajs/react'
import Layout from '@/Components/Layout'

/**
 * Halaman detail satu ikatan (bundle) berkas.
 * Props yang datang dari BundleController::show():
 * {
 *   bundle: {
 *     id,
 *     bundle_no,
 *     retentions: [
 *       {
 *         id, seq_in_bundle, pages_count, status,
 *         patient: { medical_rec_no, name }
 *       }, ...
 *     ]
 *   }
 * }
 */
export default function Show () {
  /* ambil props yang dikirim Inertia */
  const { bundle } = usePage().props

  return (
    <Layout>
      {/* ------------------------------ */}
      {/* <Head> menetapkan judul tab halaman */}
      <Head title={`Ikatan #${bundle.bundle_no}`} />

      {/* Judul + tombol kembali */}
      <div className="flex items-center justify-between mb-6">
        <h1 className="text-2xl font-semibold">
          Ikatan #{bundle.bundle_no}
        </h1>

        {/* route() helper tersedia dari Ziggy (otomatis di Breeze) */}
        <Link
          href={route('bundles.index')}
          className="text-blue-600 hover:underline"
        >
          ← Kembali ke daftar
        </Link>
      </div>

      {/* Tabel daftar berkas dalam ikatan */}
      <div className="overflow-x-auto">
        <table className="min-w-full border text-sm">
          <thead className="bg-gray-100">
            <tr className="text-left">
              <th className="px-3 py-2 border">No Urut</th>
              <th className="px-3 py-2 border">No RM</th>
              <th className="px-3 py-2 border">Nama Pasien</th>
              <th className="px-3 py-2 border text-center">Halaman</th>
              <th className="px-3 py-2 border text-center">Status</th>
            </tr>
          </thead>

          <tbody>
            {bundle.retentions.map(r => (
              <tr key={r.id} className="border-t hover:bg-gray-50">
                <td className="px-3 py-1">{r.seq_in_bundle}</td>
                <td className="px-3 py-1">{r.patient?.medical_rec_no}</td>
                <td className="px-3 py-1">{r.patient?.name}</td>
                <td className="px-3 py-1 text-center">{r.pages_count}</td>
                <td className="px-3 py-1 text-center">
                  {/* Badge warna sederhana */}
                  <span
                    className={`inline-block px-2 py-0.5 rounded-full text-xs font-semibold
                      ${r.status === 'Aktif'       ? 'bg-green-100 text-green-800'
                      : r.status === 'Inaktif'     ? 'bg-yellow-100 text-yellow-800'
                      : /* Dimusnahkan */            'bg-red-100 text-red-800'}`}
                  >
                    {r.status}
                  </span>
                </td>
              </tr>
            ))}

            {/* Jika ikatan kosong */}
                        {bundle.retentions.length === 0 && (
                          <tr>
                            <td colSpan="5" className="text-center py-6 text-gray-500">
                              Tidak ada berkas dalam ikatan ini.
                            </td>
                          </tr>
                        )}
                      </tbody>
                    </table>
                  </div>
                </Layout>
              )
            }
