import { Head, Link, usePage } from '@inertiajs/react'
import Layout from '@/Components/Layout'

export default function Index() {
  const { bundles } = usePage().props

  return (
    <Layout>
      <Head title="Daftar Ikatan" />
      <h1 className="text-2xl font-semibold mb-4">Daftar Ikatan</h1>

      <table className="w-full border">
        <thead><tr><th>No Ikatan</th><th>Jumlah Berkas</th></tr></thead>
        <tbody>
          {bundles.data.map(b => (
            <tr key={b.id} className="border-t hover:bg-gray-50">
              <td>
                <Link href={route('bundles.show', b.id)} className="text-blue-600">
                  {b.bundle_no}
                </Link>
              </td>
              <td>{b.retentions_count}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </Layout>
  )
}
