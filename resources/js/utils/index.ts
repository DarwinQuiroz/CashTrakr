export function formatCurrency(amount: number) {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
    }).format(amount)
}

export function formatDate(date: string | null) {
    if(!date) return

    return new Intl.DateTimeFormat('es-EC', {
        day: 'numeric',
        month: 'long',
        year: 'numeric',
    }).format(new Date(date))
}