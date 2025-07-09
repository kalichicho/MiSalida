import { useForm } from 'react-hook-form'
import { z } from 'zod'
import { zodResolver } from '@hookform/resolvers/zod'

const schema = z.object({
  email: z.string().email(),
  password: z.string().min(6),
  phone: z.string().optional(),
  name: z.string().min(1, 'Requerido'),
  birthdate: z.string().min(1, 'Requerido'),
  gender: z.enum(['male', 'female', 'other']).optional(),
  title: z.string().min(1, 'Requerido'),
  description: z.string().min(1, 'Requerido'),
  rate: z.string().regex(/^[0-9]+$/, 'Debe ser numérico'),
  zone: z.string().min(1, 'Requerido'),
  languages: z.string().optional(),
  terms: z.literal(true, {
    errorMap: () => ({ message: 'Debes aceptar los términos' }),
  }),
})

type FormData = z.infer<typeof schema>

export default function SignUp() {
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm<FormData>({ resolver: zodResolver(schema) })

  const onSubmit = (data: FormData) => {
    // TODO: send data to API
    console.log('Sign up data', data)
  }

  return (
    <div className="max-w-md mx-auto p-4">
      <h1 className="text-xl font-bold mb-4">Crear cuenta</h1>
      <form onSubmit={handleSubmit(onSubmit)} className="space-y-4">
        <div>
          <label className="block mb-1" htmlFor="email">Email</label>
          <input id="email" type="email" {...register('email')} className="border rounded w-full p-2" />
          {errors.email && <p className="text-red-600 text-sm">{errors.email.message}</p>}
        </div>
        <div>
          <label className="block mb-1" htmlFor="password">Contraseña</label>
          <input id="password" type="password" {...register('password')} className="border rounded w-full p-2" />
          {errors.password && <p className="text-red-600 text-sm">{errors.password.message}</p>}
        </div>
        <div>
          <label className="block mb-1" htmlFor="phone">Teléfono</label>
          <input id="phone" type="tel" {...register('phone')} className="border rounded w-full p-2" />
        </div>
        <div>
          <label className="block mb-1" htmlFor="name">Nombre o alias</label>
          <input id="name" type="text" {...register('name')} className="border rounded w-full p-2" />
          {errors.name && <p className="text-red-600 text-sm">{errors.name.message}</p>}
        </div>
        <div>
          <label className="block mb-1" htmlFor="birthdate">Fecha de nacimiento</label>
          <input id="birthdate" type="date" {...register('birthdate')} className="border rounded w-full p-2" />
          {errors.birthdate && <p className="text-red-600 text-sm">{errors.birthdate.message}</p>}
        </div>
        <div>
          <label className="block mb-1" htmlFor="gender">Género</label>
          <select id="gender" {...register('gender')} className="border rounded w-full p-2">
            <option value="">Selecciona</option>
            <option value="male">Masculino</option>
            <option value="female">Femenino</option>
            <option value="other">Otro</option>
          </select>
        </div>
        <div>
          <label className="block mb-1" htmlFor="title">Título del anuncio</label>
          <input id="title" type="text" {...register('title')} className="border rounded w-full p-2" />
          {errors.title && <p className="text-red-600 text-sm">{errors.title.message}</p>}
        </div>
        <div>
          <label className="block mb-1" htmlFor="description">Descripción</label>
          <textarea id="description" {...register('description')} className="border rounded w-full p-2" />
          {errors.description && <p className="text-red-600 text-sm">{errors.description.message}</p>}
        </div>
        <div>
          <label className="block mb-1" htmlFor="rate">Tarifa (por hora)</label>
          <input id="rate" type="text" {...register('rate')} className="border rounded w-full p-2" />
          {errors.rate && <p className="text-red-600 text-sm">{errors.rate.message}</p>}
        </div>
        <div>
          <label className="block mb-1" htmlFor="zone">Zona de cobertura</label>
          <input id="zone" type="text" {...register('zone')} className="border rounded w-full p-2" />
          {errors.zone && <p className="text-red-600 text-sm">{errors.zone.message}</p>}
        </div>
        <div>
          <label className="block mb-1" htmlFor="languages">Idiomas</label>
          <input id="languages" type="text" {...register('languages')} className="border rounded w-full p-2" />
        </div>
        <div className="flex items-center">
          <input id="terms" type="checkbox" {...register('terms')} className="mr-2" />
          <label htmlFor="terms" className="text-sm">Acepto los términos y condiciones</label>
          {errors.terms && <p className="text-red-600 text-sm ml-2">{errors.terms.message}</p>}
        </div>
        <button type="submit" className="bg-blue-500 text-white px-4 py-2 rounded">Registrarse</button>
      </form>
    </div>
  )
}
